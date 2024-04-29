"use strict";

//---------------------------------------------------JSON--------------------------------------------------------------//

const Json = `{
    "top5":[
        {
            "id":"31",
            "title":"Dune: Part II",
            "runtime":"2h 47m",
            "ageClassification":"12A",
            "Year":"2024",
            "genre":"Action, Adventure",
            "director":"Francis Lawrence",
            "actors":"Souheila Yacoub, Austin Butler, Timothée Chalamet, Tim Blake Nelson",
            "synopsis":"Paul Atreides unites with Chani and the Fremen while on a warpath of revenge against the conspirators who destroyed his family. Facing a choice between the love of his life and the fate of the known universe, he endeavors to prevent a terrible future only he can foresee.",
            "imageUrl":"https://www.dvdsreleasedates.com/posters/800/D/Dune-Part-Two-2023-movie-poster.jpg",
            "image2Url":"https://cdn.mos.cms.futurecdn.net/VWFncKUBaF9E3v4k8QkJbf.jpg",
            "videoUrl":"https://www.youtube.com/watch?v=U2Qp5pL3ovA"
        },
        {
            "id":"32",
            "title":"Godzilla x Kong",
            "runtime":"1h 55m",
            "ageClassification":"12A",
            "Year":"2024",
            "genre":"Action",
            "director":"Adam Wingard",
            "actors":"Alex Ferns, Rebecca Hall, Dan Stevens, Fala Chen, Brian Tyree Henry, Kaylee Hottle",
            "synopsis":"The epic battle continues! Legendary Pictures cinematic Monsterverse follows up the explosive showdown of “Godzilla vs. Kong” with an all-new adventure that pits the almighty Kong and the fearsome Godzilla against a colossal undiscovered threat hidden within our world, challenging their very existence—and our own. “Godzilla x Kong: The New Empire” delves further into the histories of these Titans and their origins, as well as the mysteries of Skull Island and beyond, while uncovering the mythic battle that helped forge these extraordinary beings and tied them to humankind forever.",
            "imageUrl":"https://m.media-amazon.com/images/I/711ltjnT18L._AC_UF1000,1000_QL80_.jpg",
            "image2Url":"https://m.media-amazon.com/images/M/MV5BNjUxYmIzNWEtOTk4MC00MTUyLWE3OWEtNDY5ZGI0YmM1YmYzXkEyXkFqcGdeQVRoaXJkUGFydHlJbmdlc3Rpb25Xb3JrZmxvdw@@._V1_.jpg",
            "videoUrl":"https://www.youtube.com/watch?v=lV1OOlGwExM"
        },
        {
            "id":"33",
            "title":"Inmaculate",
            "runtime":"1h 29m",
            "ageClassification":"16",
            "Year":"2024",
            "genre":"Horror",
            "director":"Michael Mohan",
            "actors":"Sydney Sweeney, Benedetta Porcaroli, Álvaro Morte, Simona Tabasco",
            "synopsis":"Sydney Sweeney (Anyone But You, Euphoria, The White Lotus) stars as Cecilia, an American nun of devout faith, embarking on a new journey in a remote convent in the picturesque Italian countryside. Cecilias warm welcome quickly devolves into a nightmare as it becomes clear her new home harbours a sinister secret and unspeakable horrors.",
            "imageUrl":"https://m.media-amazon.com/images/M/MV5BNmYyZGQzM2YtYTY3My00NGE5LWIzMmQtMDIxMTFhMGIxZDhhXkEyXkFqcGdeQXVyMTY0Njc2MTUx._V1_FMjpg_UX1000_.jpg",
            "image2Url":"https://www.heavenofhorror.com/wp-content/uploads/2024/01/immaculate-2024-horror-movie.jpg",
            "videoUrl":"https://www.youtube.com/watch?v=ewxS9Z-XXYo"
        },
        {
            "id":"34",
            "title":"Barbie",
            "runtime":"1h 54m",
            "ageClassification":"12A",
            "Year":"2023",
            "genre":"Adventure, Comedy, Fantasy",
            "director":"Greta Gerwig",
            "actors":"Margot Robbie, Ryan Gosling, Issa Rae",
            "synopsis":"Eccentric and individualistic, Barbie is exiled from Barbieland because of her imperfections. When her home world is in peril, Barbie returns with the knowledge that what makes her different also makes her stronger.",
            "imageUrl":"https://web-booking.lighthousegroup.ie/CDN/Image/Entity/FilmPosterGraphic/HO00000810",
            "image2Url":"https://hips.hearstapps.com/hmg-prod/images/barbie-trailer-film-margot-robbie-646f77b0b6a30.jpg?crop=1xw:0.84375xh;center,top&resize=1200:*",
            "videoUrl":"https://www.youtube.com/watch?v=pBk4NYhWNMM"
        },
        {
            "id":"35",
            "title":"Poor Things",
            "runtime":"2h 22m",
            "ageClassification":"18",
            "Year":"2024",
            "genre":"Crime, Drama, Thriller",
            "director":"Yorgos Lanthimos",
            "actors":"Willem Dafoe, Emma Stone, Christopher Abbott, Margaret Qualley, Mark Ruffalo, Jerrod Carmichael",
            "synopsis":"When a young woman in Victorian England meets a tragic end, little did she know how much life still lay in store for her. Re-animated by her de facto guardian, the scientist Dr Goodwin Baxter, Bella Baxters mind soon becomes increasingly alive to the opportunities the world offers.",
            "imageUrl":"https://www.pearlanddean.com/wp-content/uploads/2024/01/PoorThings-17-683x1024.jpg",
            "image2Url":"https://www.ekathimerini.com/wp-content/uploads/2023/08/poorthings_web.jpg",
            "videoUrl":"https://www.youtube.com/watch?v=ZFu7ZH4y6J4"
        }
    ]
}`;
const myJson = JSON.parse(Json);
let data = document.querySelector(".data");
//---------------------------------------------------------------------------------------------------------------------//

//-------------------------WEBPAGE STRUCTURE AND MAIN FUNCTIONS ONCE THE WEBPAGE IS LOADED-----------------------------//
window.addEventListener("load", () => {
  runCarrousel(); //Running carousel

  //showMoviesList(); //Running Movie List in order to display all available movies
  //------Running searcher input in order to find the wished movie--------------//
  const searcher = document.querySelector(".search");
  /*searcher.addEventListener("keyup", (e) => {
    showMoviesList(e.target.value.toLowerCase().trim()) //Calling function with word written in searcher
  });*/

  /*searcher.addEventListener("keyup", (e) => {
    movieSearched.forEach((movieSelected) => {
      //---if the movie if found a new class should be added to the div in order to appear selected movie and disappear the other movies--//
      if (
        movieSelected.textContent.toLowerCase().includes(e.target.value.toLowerCase().trim()) //Searching by letters entered
      ) {
        movieSelected.classList.remove("desactive"); // showing movies
      } else {
        movieSelected.classList.add("desactive"); // hiding movies
      }
    });
  });*/
});

//----------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------Showing Menu------------------------------------------------------//
// Selecting the element with the class "menu-icon" and storing it in the variable "menubar"
const menubar = document.querySelector(".menu-icon");

// Selecting the element with the class "menu-container" and storing it in the variable "navBar"
const navBar = document.querySelector(".menu-container");

// Adding an event listener to the "menubar" element, listening for a click event
menubar.addEventListener("click", () => {
  // Toggling the "active" class on the "navBar" element when "menubar" is clicked
  navBar.classList.toggle("active");
});
//----------------------------------------------------CAROUSEL----------------------------------------------------------//
const carousel = document.querySelector(".carrousel"); // Carousel container
const carouselTitle = document.querySelector(".carousel-title"); // Carousel title
let currentPosition = 0; // Carousel counter
const buttonBackward = document.querySelector(".backward").addEventListener("click", (e) => Backward()); //Carousel button to go backward
const carrouselImage = document.querySelector(".carrousel-image"); //Carousel picture container
const picture = document.querySelector(".picture"); // Carousel picture
const buttonForward = document.querySelector(".forward").addEventListener("click", (e) => Forward()); //Carousel button to go forward
const checkMobile = window.matchMedia("screen and (max-width: 992px)").matches; //creating a breakpoint media for mobile


picture.addEventListener("click", (e) => { //if picture is clicked movie content will be displayed
  showMovieContent(e.target.id);
});

//------------------------------function to go back to previous image------------------------------------//
function Backward() {
  if (currentPosition <= 0) { //if movie is in the first position, counter goes to last position
    currentPosition = myJson.top5.length - 1;
  } else {
    currentPosition--; // substract 1 to counter
  }
  //----Media conditional for mobile in order to show mobile pcitures----//
  if (window.matchMedia("screen and (max-width: 992px)").matches)
    showCarrouselImage(
      myJson.top5[currentPosition].imageUrl,
      myJson.top5[currentPosition].id,
      myJson.top5[currentPosition].title
    );
  else
    showCarrouselImage(
      myJson.top5[currentPosition].image2Url,
      myJson.top5[currentPosition].id,
      myJson.top5[currentPosition].title
    );
}

//----function to go forward to next image-----//
function Forward() {
  if (currentPosition >= myJson.top5.length - 1) { //if movie is in the last position, counter goes to 0
    currentPosition = 0;
  } else {
    currentPosition++; // add 1 to counter
  }
  //----------------------Media conditional for mobile in order to show mobile pcitures------------------//
  if (window.matchMedia("screen and (max-width: 992px)").matches)
    showCarrouselImage(
      myJson.top5[currentPosition].imageUrl,
      myJson.top5[currentPosition].id,
      myJson.top5[currentPosition].title
    );
  else
    showCarrouselImage(
      myJson.top5[currentPosition].image2Url,
      myJson.top5[currentPosition].id,
      myJson.top5[currentPosition].title
    );
}

//function to set attributes in order to show the current image within the carousel
function showCarrouselImage(url, id, alt) {
  picture.setAttribute("id", id);
  picture.setAttribute("src", url);
  picture.setAttribute("alt", alt);
  carouselTitle.textContent = alt;
}

//-------------------Fuction to change forward the carousel images every 7 seconds-------------------//
function runCarrousel() {
  setInterval(Forward, 5000); 
}
//-----------------------------------------------------------------------------------------------------------------------//

//------------------------------------------- DISPLAYING A LIST OF ALL MOVIES -------------------------------------------//

const listContainer = document.querySelector(".movies-list");
const listTitle = document.getElementById("movieList-title");
const selectCinema = document.getElementById("cinemaSelection");


  //-----Running movies content by clicking the picture of every movie-----------------------------------------------//


const movieSelection = document.querySelectorAll(".movieListPicture");
  movieSelection.forEach((movieSelection) => {
    movieSelection.addEventListener("click", (e) => {
      fetchMovies(e.target.id);
    });
  });



//------------------------------------------------------------------------------------------------------------------------//


//---------------------------------------------------MOVIE CONTENT BOX----------------------------------------------------//

const movieContainer = document.querySelector(".movieInfo-container");
const escape = document.querySelector(".escape").addEventListener("click", (e) => closeMovieContent());
const movieVideo = document.querySelector(".movie-video");
const movieBg = document.querySelector(".movie-content");
const movieImg = document.querySelector(".movie-img");
const movieTitle = document.querySelector(".movie-title");
const movie_id = document.querySelector(".movie-id");
const movieRuntime = document.querySelector(".movie-runtime");
const movieGenre = document.querySelector(".movie-genre");
const movieYear = document.querySelector(".movie-year");
const movieAge = document.querySelector(".movie-age");
const movieDirector = document.querySelector(".movie-director");
const movieActors = document.querySelector(".movie-actors");
const movieSynopsis = document.querySelector(".movie-synopsis");
const movieSel = document.getElementById('moviesel');
const bookingButton = document.querySelector(".booking").addEventListener("click", (e) => {
  myForm(true);});
  const data1 = document.querySelector(".data");

 // Function to create an AJAX request
function fetchMovies(movieId) {
  console.log("test"); // Logging a test message to the console

  // Creating a new XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Configuring the request
  xhr.open('GET', './Connector/getData.php?action=get_movie_by_id&movie_id=' + movieId, true);

  // Configuring the expected response type
  xhr.responseType = 'json';

  // Configuring the event handler for successful request loading
  xhr.onload = function() {
    if (xhr.status === 200) { // Checking if the request completed successfully
      // Checking if there is data in the response
      if (xhr.response && xhr.response.length > 0) {
        // Looping through the received data
        var movie = xhr.response.find(function(item) {
          return item.movie_id === movieId;
        });
        
        // Performing data manipulation as desired
        // For example, you can print them to the browser console

        // Setting movie information to display if found
        if (movie) {
          // Hiding list container, carousel, and list title
          listContainer.style.display = "none";
          carousel.style.display = "none";
          listTitle.style.display = "none";

          // Displaying movie container
          movieContainer.style.display = "flex";

          // Setting movie image source and alt text
          movieImg.setAttribute("src", movie.movie_imageUrl);
          movieImg.setAttribute("alt", movie.movie_title);

          // Selecting movie trailer
          selectMovieTrailer(movie.movie_videoUrl);

          // Setting movie title, runtime, genre, release year, age classification, director, actors, and synopsis
          movieTitle.textContent = `${movie.movie_title}`;
          movie_id.textContent = `ID: ${movie.movie_id}`;
          movieRuntime.textContent = `Runtime: ${movie.movie_runtime}`;
          movieGenre.textContent = `Genre: ${movie.movie_genre}`;
          movieYear.textContent = `Release Year: ${movie.movie_release}`;
          movieAge.textContent = `Age Classification: ${movie.movie_classification}`;
          movieDirector.textContent = `Director: ${movie.movie_director}`;
          movieActors.textContent = `Actors: ${movie.movie_actors}`;
          movieSynopsis.textContent = `Synopsis: ${movie.movie_synopsis}`;
          movieSel.value = movie.movie_title; // Setting movie selection value
        } else {
          alert("No movie found with the provided ID");
        }
      } else {
        alert("No movies found");
      }
    } else {
      console.error('Error in the request: ' + xhr.status); // Logging an error message if the request fails
    }
  };

  // Configuring the event handler for request errors
  xhr.onerror = function() {
    console.error('Network error when trying to make the request.'); // Logging a network error message
  };

  // Sending the request
  xhr.send();
}

//----------------Function to display the movie information when a movie is clicked-------------//

function showMovieContent(idNumber) {
  listContainer.style.display = "none";
  carousel.style.display = "none";
  listTitle.style.display = "none";
  
  // Buscar la película por su ID dentro del objeto myJson.top5
  let movie = myJson.top5.find(movie => movie.id === idNumber);

  if (movie) {
    // Mostrar la información de la película
    selectMovieTrailer(movie.videoUrl);
    movieContainer.style.display = "flex";
    movieImg.setAttribute("src", movie.imageUrl);
    movieImg.setAttribute("alt", movie.title);
    movieTitle.textContent = `${movie.title}`;
    movie_id.textContent = `ID: ${movie.id}`;
    movieRuntime.textContent = `Runtime: ${movie.runtime}`;
    movieGenre.textContent = `Genre: ${movie.genre}`;
    movieYear.textContent = `Release Year: ${movie.Year}`;
    movieAge.textContent = `Age Classification: ${movie.ageClassification}`;
    movieDirector.textContent = `Director: ${movie.director}`;
    movieActors.textContent = `Actors: ${movie.actors}`;
    movieSynopsis.textContent = `Synopsis: ${movie.synopsis}`;
    movieSel.value = movie.title;
  } else {
    console.log(`No se encontró ninguna película con el ID ${idNumber}`);
  }
}


let currentVideoElement = null;

//----------Displaying Movie Trailer within movie content ------------------------//
function selectMovieTrailer(movie) {
  try {
    if (currentVideoElement) {
      movieVideo.removeChild(currentVideoElement);
    }
    let videoElement = document.createElement("iframe");

    videoElement.width = "100%"; // Video width
    videoElement.height = "415"; // Video height
    videoElement.src = movie.replace("watch?v=", "embed/"); // Converting youtube link to embed format

    movieVideo.appendChild(videoElement);
    currentVideoElement = videoElement;
  } catch (e) {
    console.log(e);
  }
}
//-------------------Function to close the box when 'X' is clicked--------------------
function closeMovieContent() {
  movieContainer.style.display = "none";
  listContainer.style.display = "flex";
  carousel.style.display = "flex";
  listTitle.style.display = "block";
  myForm(false); //Closing form
}

//--------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------//

//---------------------------------FORM------------------------------------

//---------VALIDATOR VARIABLES--------//
let fn;
let ln;
let ea;
let cin;
let tim;
let tick;
//------------------------------------//

//----------MESSAGES VARIBLES---------//
const firstNameMessage = document.querySelector(".firstN");
const lastNameMessage = document.querySelector(".lastN");
const emailMessage = document.querySelector(".emailA");
const cinemaMessage = document.querySelector(".cine");
const timeMessage = document.querySelector(".tim");
const ticketMessage = document.querySelector(".ticketQ");
//-----------------------------------//

//-------Setting form input-------------------//
const form = document.getElementById("myForm");

//If cancel button is pressed the form will close
const cancel = document.querySelector(".cancel").addEventListener("click", (e) => {myFormCancel();});

//getting firstname input info
const firstName = document.getElementById("firstName");
firstName.addEventListener("keyup", (e) => {
  inputLength(e.target.value, firstName);
});

//getting lastname input info
const lastName = document.getElementById("lastName");
lastName.addEventListener("keyup", (e) => {
  inputLength(e.target.value, lastName);
});

//getting email address input info
const emailAddress = document.getElementById("email");
emailAddress.addEventListener("keyup", (e) => {
  emailChecker(e.target.value);
});
//getting cinema input info
const cinema = document.getElementById("cinema");
cinema.addEventListener("change", (e) => {
  cinemaChecker(e.target.value);
});

//getting time input info
const schedule = document.getElementById("time");
schedule.addEventListener("change", (e) => {
  timeChecker(e.target.value);
});

//getting ticket amount input info
const ticketAmount = document.getElementById("ticketQuantity");
ticketAmount.addEventListener("change", (e) => {
  ticketChecker(e.target.value);
});

//--------------------------------------------------//

//---------------form functions---------------------//
//-------------Showing up the form---------------//
function myForm(OC) {
  if (OC) {
    form.style.display = "flex";
  }
  else form.style.display = "none";
}
//------------------Cancel button function--------//
function myFormCancel() {
  form.style.display = "none";
}

//-----------------First Name and Last Name validator function --------//
function inputLength(value, obj) {
  if (value.length > 1 && value.match("^[a-zA-Z]+$")) {
    obj.style.border = "3px solid green";
    if (obj == firstName) {
      fn = true;
      firstNameMessage.textContent = "";
    } else {
      ln = true;
      lastNameMessage.textContent = "";
    }
  } else {
    obj.style.border = "3px solid red";
    if (obj == firstName) {
      fn = false;
      firstNameMessage.textContent =
        "First Name must be letters and no less than 2";
    } else {
      ln = false;
      lastNameMessage.textContent =
        "Last Name must be letters and no less than 2";
    }
  }
}
//-----------email checker function ------------------------//
function emailChecker(email) {
  let regexPattern =
    "^(?=.{1,64}@)[A-Za-z0-9_-]+(\\.[A-Za-z0-9_-]+)*@" +
    "[^-][A-Za-z0-9-]+(\\.[A-Za-z0-9-]+)*(\\.[A-Za-z]{2,})$";
  if (email.match(regexPattern)) {
    emailAddress.style.border = "3px solid green";
    ea = true;
    emailMessage.textContent = "";
  } else {
    emailAddress.style.border = "3px solid red";
    ea = false;
    emailMessage.textContent = "Please introduce a valid email address";
  }
}

//----------------cinema selection function-----------------//
function cinemaChecker(cinemaSelected) {
  if (cinemaSelected != "cinema") {
    cinema.style.border = "3px solid green";
    cin = true;
    cinemaMessage.textContent = "";
  } else {
    cinema.style.border = "3px solid red";
    cin = false;
    cinemaMessage.textContent = "Please select a cinema";
  }
}
//------------------Movie time function-----------------//
function timeChecker(time) {
  if (time != "time") {
    schedule.style.border = "3px solid green";
    tim = true;
    timeMessage.textContent = "";
  } else {
    schedule.style.border = "3px solid red";
    tim = false;
    timeMessage.textContent = "Please select a valid time";
  }
}
//---------------Ticket checker function----------------//
function ticketChecker(ticket) {
  if (ticket >= 1 && ticket <= 10) {
    ticketAmount.style.border = "3px solid green";
    tick = true;
    ticketMessage.textContent = "";
  } else {
    ticketAmount.style.border = "3px solid red";
    tick = false;
    ticketMessage.textContent = "Please introduce a ticket from 1 to 10";
  }
}
//----------------Booking button validator function-----------------//
const book = document.querySelector(".book").addEventListener("click", (e) => {
  if (
    fn == true &&
    ln == true &&
    ea == true &&
    cin == true &&
    tim == true &&
    tick == true
  ) {
    myFormCancel();
  }
});


  document.addEventListener("DOMContentLoaded", function() {
    // Tu código aquí
    if (document.getElementById("myModal")) {
      var modal = document.getElementById("myModal");
      var span = document.getElementsByClassName("close")[0];
      span.onclick = function() {
        modal.style.display = "none";
      }
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    }
  });

