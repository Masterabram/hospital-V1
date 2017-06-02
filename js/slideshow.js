var myImage = document.getElementById("img")

var imageArray = ["img1.jpg","img2.png","img3.png","img4.png","img5.jpg"];

var imageIndex=0;

function changeImage (){
	img.setAttribute("src", imageArray [imageIndex]);
	imageIndex ++;
	
	if (imageIndex>=imageArray.length){
		imageIndex=0;
		}
	}
	
var intervalHandler = setInterval(changeImage,2000);

img.onClick=function(){
	clearInterval(intervalHandle);
	}	