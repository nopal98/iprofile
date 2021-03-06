<style type="text/css">
	#wrapper {
  opacity: 0;
  display: table;
  height: 100%;
  width: 100%;
}
#wrapper.loaded {
  opacity: 1;
  transition: 2.5s ease-in-out;
}
#wrapper #content {
  display: table-cell;
  vertical-align: middle;
}

#card {
  height: 400px;
  width: 300px;
  margin: 0 auto;
  position: relative;
  z-index: 1;
  perspective: 600px;
}
#card #front, #card #back {
  border-radius: 10px;
  height: 100%;
  width: 100%;
  position: absolute;
  left: 0;
  top: 0;
  transform-style: preserve-3d;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
#card #front {
  transform: rotateY(0deg);
  overflow: hidden;
  z-index: 1;
}
#card #front #arrow {
  position: absolute;
  height: 50px;
  line-height: 50px;
  font-size: 30px;
  z-index: 10;
  bottom: 0;
  right: 50px;
  color: rgba(255, 255, 255, 0.5);
  -webkit-animation: arrowWiggle 1s ease-in-out infinite;
          animation: arrowWiggle 1s ease-in-out infinite;
}
#card #front #top-pic {
  height: 50%;
  width: 100%;
  background-image: url(https://unsplash.imgix.net/45/ZLSw0SXxThSrkXRIiCdT_DSC_0345.jpg?q=75&w=1080&h=1080&fit=max&fm=jpg&auto=format&s=857f07b76abac23a7fb7161cc7b12a46);
  background-size: cover;
}
#card #front #avatar {
  width: 114px;
  height: 114px;
  top: 50%;
  left: 50%;
  margin: -77px 0 0 -57px;
  border-radius: 100%;
  box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.8), 0 4px 5px rgba(107, 5, 0, 0.6), 0 0 50px 50px rgba(255, 255, 255, 0.25);
  background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/387354/about-face.png);
  background-size: 120px auto;
  background-repeat: no-repeat;
  background-position: 17px 1px;
  background-color: #333;
  position: absolute;
  z-index: 1;
}
#card #front #info-box {
  height: 50%;
  width: 100%;
  position: absolute;
  display: table;
  left: 0;
  bottom: 0;
  background: rgba(200, 38, 29, 0.7);
  padding: 50px;
}
#card #front #social-bar {
  height: 50px;
  width: 100%;
  position: absolute;
  bottom: 0;
  left: 0;
  line-height: 50px;
  font-size: 18px;
  text-align: center;
}
#card #front #social-bar a {
  display: inline-block;
  color: #951009;
  text-decoration: none;
  padding: 5px;
  line-height: 18px;
  border-radius: 5px;
}
#card #front #social-bar a:hover {
  color: #450300;
  background: rgba(255, 255, 255, 0.3);
  transition: 0.25s ease-in-out;
}
#card #back {
  transform: rotateY(180deg);
  background-color: rgba(255, 255, 255, 0.6);
  display: table;
  z-index: 2;
  font-size: 13px;
  line-height: 20px;
  padding: 50px;
}
#card #back .back-info {
  text-align: justify;
  text-justify: inter-word;
}
#card #back #social-bar {
  height: 50px;
  width: 100%;
  position: absolute;
  bottom: 0;
  left: 0;
  line-height: 50px;
  font-size: 18px;
  text-align: center;
}
#card #back #social-bar a {
  display: inline-block;
  line-height: 18px;
  color: #951009;
  text-decoration: none;
  padding: 5px;
  border-radius: 5px;
}
#card #back #social-bar a:hover {
  color: #450300;
  background: rgba(223, 74, 66, 0.5);
  transition: 0.25s ease-in-out;
}
#card .info {
  display: table-cell;
  height: 100%;
  vertical-align: middle;
  text-align: center;
}
#card.flip #front {
  transform: rotateY(180deg);
}
#card.flip #back {
  transform: rotateY(360deg);
}

#background {
  position: fixed;
  background-color: black;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
}
#background #background-image {
  height: calc(100% + 60px);
  width: calc(100% + 60px);
  position: absolute;
  top: -30px;
  left: -30px;
  -webkit-filter: blur(10px);
  background-image: url(https://unsplash.imgix.net/45/ZLSw0SXxThSrkXRIiCdT_DSC_0345.jpg?q=75&w=1080&h=1080&fit=max&fm=jpg&auto=format&s=857f07b76abac23a7fb7161cc7b12a46);
  background-size: cover;
}

@-webkit-keyframes arrowWiggle {
  0% {
    right: 50px;
  }
  50% {
    right: 35px;
  }
  100% {
    right: 50px;
  }
}

@keyframes arrowWiggle {
  0% {
    right: 50px;
  }
  50% {
    right: 35px;
  }
  100% {
    right: 50px;
  }
}
</style>


<div id="wrapper">
  <div id="content">
    <div id="card">
      <div id="front">
        <div id="arrow"><i class="fa fa-arrow-left"></i></div>
        <div id="top-pic"></div>
        <div id="avatar"></div>
        <div id="info-box">
          <div class="info">
            <h1>Maciej Caputa</h1>
            <h2>Web Developer</h2>
          </div>
        </div>
        <div id="social-bar"><a href="https://uk.linkedin.com/in/maciejcaputa" target="_blank"><i class="fa fa-linkedin"></i></a><a href="https://github.com/MaciejCaputa" target="_blank"><i class="fa fa-github"> </i></a><a href="https://codepen.io/MaciejCaputa/" target="_blank"><i class="fa fa-codepen">   </i></a><a class="more-info" href="#"><i class="fa fa-user"></i></a></div>
      </div>
      <div id="back">
        <div class="back-info">
          <p>Hi! My name is Maciej Caputa. I'm intensely creative, web developer and designer. I'm passionate about creating e-learning websites such as Matematika.pl. I also specialise in creating modern and responsive landing pages for business companies which will increase your revenue. If you???re interested in any of my service then let's get in touch. Contact me on <a href="http://maciejcaputa.com" target="_blank">maciejcaputa.com</a></p>
        </div>
        <div id="social-bar"><a href="https://uk.linkedin.com/in/maciejcaputa" target="_blank"><i class="fa fa-linkedin"></i></a><a href="https://github.com/MaciejCaputa" target="_blank"><i class="fa fa-github"> </i></a><a href="https://codepen.io/MaciejCaputa/" target="_blank"><i class="fa fa-codepen"> </i></a><a class="more-info" href="#"><i class="fa fa-undo"></i></a></div>
      </div>
    </div>
    <div id="background">
      <div id="background-image"></div>
    </div>
  </div>
</div>