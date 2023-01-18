<script
    defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoFu28uKIck0QvJLDcLMefmOvnBrMGkRo&callback=initMap"
  ></script>

<section id="subVisual">
        <img src="/resources/img/visual-txt.png" alt="" id="sub-visual-txt">
        <div id="pageUrl">
            HOME > 기관소개 > <span>오시는 길</span>
        </div>
    </section>

    <section id="rootShow">
        <h2>오시는 길</h2>
        <div id="map"></div>
        <div id="rootInfo">
            <div>
                <div>주소</div>
                <div>충청북도 증평군 증평읍 광장로30 (송산리 734) 홍익프라자 3층</div>
            </div>
            <div>
                <div>전화번호</div>
                <div>043-838-6645</div>
            </div>
        </div>
    </section>


    <script>
        window.initMap = function () {
  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 36.789780, lng: 127.578244 },
    zoom: 16,
  });

  const marker = new google.maps.Marker({
      position: { lat:36.789780, lng:127.578244 },
      map,
    });
};
    </script>