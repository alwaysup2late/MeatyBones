MB.Slider = (function(){

	//Configs used by other functions
	var sliderConfig = {
		speed: 400,
		auto: 3000
	},

	//Init the inital slider instance
	homeSlider = new Swipe(document.getElementById("slider"), {
		startSlide: 0,
		speed: sliderConfig.speed,
		auto: sliderConfig.auto,
		continuous: true,
		disableScroll: false,
		stopPropagation: false,
		callback: function(index, elem) {
			if (dotsExist) {
				MB.Slider.updateIndexDots(index);
			}
		},
		transitionEnd: function(index, elem) {}
	}),

	// Dots do not exist initially
	dotsExist = false;

	return {
		//Setup hover listeners for the slider
		initSlider: function() {
			var slider = document.getElementById("slider");

			slider.onmouseenter = function() {
				homeSlider.pause();
			}

			slider.onmouseleave = function() {
				homeSlider.resume();
			}
		},

		//Creates the event listener for the previous/next buttons & directs them to their method
		initPrevNext: function() {
			var prevbutton = document.getElementById('prev'),
				nextbutton = document.getElementById('next');

			prevbutton.addEventListener("click", function(event) {
				event.preventDefault();
				homeSlider.prev();
			}, false);
			
			nextbutton.addEventListener("click", function(event) {
				event.preventDefault();
				homeSlider.next();
			}, false);
		},

		//Builds the index dots based on how many slides there are in total
		buildIndexDots: function() {
			var numSlides = homeSlider.getNumSlides(),
				slideControls = document.getElementById("slideControls");

			for (var i = 0; i < numSlides; i++) {
				var liElem = document.createElement("li");

				liElem.innerHTML = '<a href="#">' + i + '</a>';

				if (i === 0) {
					liElem.innerHTML = '<a href="#" class="active">' + i + '</a>';	
				}

				slideControls.appendChild(liElem);
			}

			dotsExist = true;
		},

		//Updates the active dot based on the active slide
		updateIndexDots: function(index) {
			var dots = document.getElementById("slideControls").getElementsByTagName("a");

			for (var i = 0; i < dots.length; i++) {
				dots[i].classList.remove("active");
			}

			dots[index].classList.add("active");
		},

		//Updates the slider to correct slide based on the index given
		updateSlider: function(index) {
			homeSlider.slide(index, sliderConfig.speed);
		},

		//Sets up the event listener and points to the method for the index dots
		initIndexControls: function() {
			var controls = document.getElementById("slideControls");

			controls.addEventListener("click", function(event){
				event.preventDefault();

				if (event.target.tagName === "A") {
					MB.Slider.updateSlider(event.target.innerHTML);
				}
			}, false);
		}
	}
}());