<!-- Modal Google Maps -->
<div id="mapModal" class="map-modal">
  <div class="map-modal-content">
    <span class="map-close" onclick="closeMapModal()">&times;</span>

    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7975685.483229248!2d122.3!3d-3.8!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d6cdf0c865528b5%3A0x3039d80b220d4f0!2sMaluku!5e0!3m2!1sid!2sid!4v1732270000000"
      width="100%"
      height="400"
      style="border:0; border-radius:10px;"
      allowfullscreen
      loading="lazy">
    </iframe>

    <a href="https://maps.app.goo.gl/MDra25YgZLtnsSLo7"
       target="_blank"
       class="open-gmaps-btn">
       🔗 Buka di Google Maps
    </a>
  </div>
</div>

<style>
  .map-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.75);
    justify-content: center;
    align-items: center;
  }
  .map-modal-content {
    background: white;
    padding: 20px;
    width: 80%;
    max-width: 750px;
    border-radius: 12px;
    position: relative;
    animation: fade 0.3s;
  }
  .map-close {
    position: absolute;
    top: 8px;
    right: 16px;
    font-size: 32px;
    font-weight: bold;
    cursor: pointer;
  }
  .open-gmaps-btn {
    display: block;
    margin-top: 10px;
    text-align: center;
    font-weight: bold;
  }
  @keyframes fade {
    from { transform: scale(0.85); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
  }
</style>

<script>
  function openMapModal() {
    document.getElementById('mapModal').style.display = 'flex';
  }
  function closeMapModal() {
    document.getElementById('mapModal').style.display = 'none';
  }
  window.onclick = function(event) {
    let modal = document.getElementById('mapModal');
    if (event.target === modal) { modal.style.display = 'none'; }
  }
</script>
