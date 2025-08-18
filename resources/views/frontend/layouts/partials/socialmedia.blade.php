{{-- <div class="icon-bar">
    <a href="https://www.facebook.com/100086786397029/" ><img src="{{asset('frontend/img/icons/facebook.png')}}" alt="Facebook" class="facebook"></a>
    <a href="https://www.instagram.com/ass.amdd/" ><img src="{{asset('frontend/img/icons/instagram.png')}}" alt="Instagram" class="instagram"></a>
    <a href="https://www.youtube.com/channel/UCBObGSzV5nwur9vWKXuuKiw" ><img src="{{asset('frontend/img/icons/youtube.png')}}" alt="YouTube" class="youtube"></a>
    <a href="https://www.linkedin.com/in/association-amdd-919ab2254/" ><img src="{{asset('frontend/img/icons/linkedin.png')}}" alt="LinkedIn" class="linkedin"></a>
</div> --}}
  
<style>
    /**fixed social media style */
  /* Fixed/sticky icon bar (vertically aligned 50% from the top of the screen) */
  .icon-bar {
    position: fixed;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    z-index: 1;
  }
  @media (max-width: 992px) {
    .icon-bar .facebook , .icon-bar .instagram  , .icon-bar .linkedin ,  .icon-bar .youtube{
        width: 25px; /* Set the desired width */
  height: 25px; /* Set the desired height */
    }
  }
  
  /* Style the icon bar links */
  .icon-bar a {
    display: block;
    text-align: center;
    padding: 16px;
    transition: all 0.3s ease;
    color: white;
    font-size: 20px;
  }
  
  /* Style the social media icons with color, if you want */
  .icon-bar a:hover {
    background-color: #444444;
  }
  
  .facebook {
    width: 40px; /* Set the desired width */
  height: 40px; /* Set the desired height */
  }
  
  /**.twitter {
    background: #55ACEE;
    color: white;
  } */
  
  .instagram {
  width: 40px; /* Set the desired width */
  height: 40px; /* Set the desired height */
  }

  
  .linkedin {
    width: 40px; /* Set the desired width */
  height: 40px; /* Set the desired height */
  }
  
  .youtube {
    width: 40px; /* Set the desired width */
  height: 40px; /* Set the desired height */
  }
  </style>