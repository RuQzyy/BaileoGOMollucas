import sys
import json
import numpy as np
from scipy.fft import rfft, rfftfreq
import soundfile as sf
from scipy.signal import butter, filtfilt

NOTE_NAMES = [
    "C", "C#", "D", "D#", "E", "F",
    "F#", "G", "G#", "A", "A#", "B"
]

def freq_to_note(frequency):
    if frequency <= 0:
        return "Unknown"

    A4 = 440
    semitones = 12 * np.log2(frequency / A4)
    note_index = int(round(semitones)) + 9
    octave = 4 + (note_index // 12)
    note_name = NOTE_NAMES[note_index % 12]
    return f"{note_name}{octave}"

def butter_bandpass(lowcut, highcut, fs, order=4):
    nyq = 0.5 * fs
    low = lowcut / nyq
    high = highcut / nyq
    return butter(order, [low, high], btype='band')

def clean_audio(data, sr):
    b, a = butter_bandpass(60, 1500, sr)
    return filtfilt(b, a, data)

def detect_pitch(audio_path):
    try:
        data, sr = sf.read(audio_path)

        if len(data.shape) > 1:
            data = np.mean(data, axis=1)

        data = data - np.mean(data)

        if np.max(np.abs(data)) < 0.01:
            return {
                "status": False,
                "message": "Suara terlalu kecil / noise terlalu tinggi"
            }

        data = clean_audio(data, sr)

        window = np.hanning(len(data))
        data = data * window

        N = len(data)
        yf = np.abs(rfft(data))
        xf = rfftfreq(N, 1 / sr)

        min_idx = np.argmax(xf > 40)
        idx = min_idx + np.argmax(yf[min_idx:])
        dominant_freq = xf[idx]

        if dominant_freq < 40 or dominant_freq > 1500:
            return {
                "status": False,
                "message": "Frekuensi tidak valid atau noise"
            }

        note_name = freq_to_note(dominant_freq)
        note_letter = note_name.rstrip("0123456789")

        return {
            "status": True,
            "frequency": float(dominant_freq),
            "note": note_name,
            "note_letter": note_letter
        }

    except Exception as e:
        return {
            "status": False,
            "message": str(e)
        }

if __name__ == "__main__":
    audio_path = sys.argv[1]
    result = detect_pitch(audio_path)
    print(json.dumps(result))
