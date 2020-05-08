  (function() {

    "use strict";

  //////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////
  //
  // H E L P E R    F U N C T I O N S
  //
  //////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////

  /**
   * Function to check if we clicked inside an element with a particular class
   * name.
   * 
   * @param {Object} e The event
   * @param {String} className The class name to check against
   * @return {Boolean}
   */
   function clickInsideElement( e, className ) {
    var el = e.srcElement || e.target;

    if ( el.classList.contains(className) ) {
      return el;
    } else {
      while ( el = el.parentNode ) {
        if ( el.classList && el.classList.contains(className) ) {
          return el;
        }
      }
    }

    return false;
   }

  /**
   * Get's exact position of event.
   * 
   * @param {Object} e The event passed in
   * @return {Object} Returns the x and y position
   */
   function getPosition(e) {
    var posx = 0;
    var posy = 0;

    if (!e) var e = window.event;

    if (e.pageX || e.pageY) {
      posx = e.pageX;
      posy = e.pageY;
    } else if (e.clientX || e.clientY) {
      posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
      posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
    }

    return {
      x: posx,
      y: posy
    }
   }

  //////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////
  //
  // C O R E    F U N C T I O N S
  //
  //////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////
  
  /**
   * Variables.
   */
   var contextMenuClassName = "context-menu";
   var contextMenuItemClassName = "context-menu__item";
   var contextMenuLinkClassName = "context-menu__link";
   var contextMenuActive = "context-menu--active";

   var taskItemClassName = "task";
   var taskItemInContext;

   var clickCoords;
   var clickCoordsX;
   var clickCoordsY;

   var menu = document.querySelector("#context-menu");
   var menuItems = menu.querySelectorAll(".context-menu__item");
   var menuState = 0;
   var menuWidth;
   var menuHeight;
   var menuPosition;
   var menuPositionX;
   var menuPositionY;

   var windowWidth;
   var windowHeight;

  /**
   * Initialise our application's code.
   */
   function init() {
    contextListener();
    clickListener();
    keyupListener();
    resizeListener();
   }

  /**
   * Listens for contextmenu events.
   */
   function contextListener() {
    document.addEventListener( "contextmenu", function(e) {
      taskItemInContext = clickInsideElement( e, taskItemClassName );

      if ( taskItemInContext ) {
        e.preventDefault();
        toggleMenuOn();
        positionMenu(e);
      } else {
        taskItemInContext = null;
        toggleMenuOff();
      }
    });
   }

  /**
   * Listens for click events.
   */
   function clickListener() {
    document.addEventListener( "click", function(e) {
      var clickeElIsLink = clickInsideElement( e, contextMenuLinkClassName );

      if ( clickeElIsLink ) {
        e.preventDefault();
        menuItemListener( clickeElIsLink );
      } else {
        var button = e.which || e.button;
        if ( button === 1 ) {
          toggleMenuOff();
        }
      }
    });
   }

  /**
   * Listens for keyup events.
   */
   function keyupListener() {
    window.onkeyup = function(e) {
      if ( e.keyCode === 27 ) {
        toggleMenuOff();
      }
    }
   }

  /**
   * Window resize event listener
   */
   function resizeListener() {
    window.onresize = function(e) {
      toggleMenuOff();
    };
   }

  /**
   * Turns the custom context menu on.
   */
   function toggleMenuOn() {
    if ( menuState !== 1 ) {
      menuState = 1;
      menu.classList.add( contextMenuActive );
    }
   }

  /**
   * Turns the custom context menu off.
   */
   function toggleMenuOff() {
    if ( menuState !== 0 ) {
      menuState = 0;
      menu.classList.remove( contextMenuActive );
    }
   }

  /**
   * Positions the menu properly.
   * 
   * @param {Object} e The event
   */
   function positionMenu(e) {
    clickCoords = getPosition(e);
    clickCoordsX = clickCoords.x;
    clickCoordsY = clickCoords.y;

    menuWidth = menu.offsetWidth + 4;
    menuHeight = menu.offsetHeight + 4;

    windowWidth = window.innerWidth;
    windowHeight = window.innerHeight;

    if ( (windowWidth - clickCoordsX) < menuWidth ) {
      menu.style.left = windowWidth - menuWidth + "px";
    } else {
      menu.style.left = clickCoordsX + "px";
    }

    if ( (windowHeight - clickCoordsY) < menuHeight ) {
      menu.style.top = windowHeight - menuHeight + "px";
    } else {
      menu.style.top = clickCoordsY + "px";
    }
   }

  /**
   * Dummy action function that logs an action when a menu item link is clicked
   * 
   * @param {HTMLElement} link The link that was clicked
   */
   function menuItemListener( link ) {
    var process=link.getAttribute("data-action");
    toggleMenuOff();
    if (process=="delete") {
    window.location="index.php?folderdelete="+taskItemInContext.getAttribute("data-id");
    }
    else if(process=="folderrename"){
      document.getElementById("pfolder").innerHTML=taskItemInContext.getAttribute("data-folder")+" Özellikleri";
      document.getElementById("folder").value=taskItemInContext.getAttribute("data-folder");
      document.getElementById("folderadi").value=taskItemInContext.getAttribute("data-folder");
    }
}

  /**
   * Run the app.
   */
   init();

})();

function myFunction() {
  var input, filter, icerik, item, h5, i, txtValue;
  var deger="";
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  icerik=document.getElementById("icerik");
  item=icerik.getElementsByTagName("div");
  for (i = 0; i < item.length; i++) {
    h5 = item[i].getElementsByTagName("h5")[0];
    txtValue = h5.textContent || h5.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      deger=deger+txtValue.toUpperCase().indexOf(filter);
      item[i].style.display="";
    } else {
      item[i].style.display="none";
    }
  }
  if (deger=="") {
    swal("Aradığınız klasör veya dosya yok!", {
      icon: "warning",
      buttons: false,
      timer: 2000,
    });
  }
}

function kopyala(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val(element).select();
  var kontrol=document.execCommand("copy");
  $temp.remove();
  if (kontrol) {
    swal("Kopyalandı!", {
      icon: "success",
      buttons: false,
      timer: 2000,
    });
    setTimeout(function(){ 
      window.close();
    },2500);
  }
  else{
    swal("Kopyalanamadı!", {
      icon: "error",
      buttons: false,
      timer: 2000,
    }); 
  }  
}

function folderrename(){
  document.getElementById("filerenametext").style.display = "block";
  document.getElementById("filerenamelabel").style.display = "none";
}
function folderrenameexit(){
  document.getElementById("filerenametext").style.display = "none";
  document.getElementById("filerenamelabel").style.display = "block";
}
function desteklenmeyen(){
  swal("Desteklenmeyen Dosya!", {
    icon: "error",
    buttons: false,
    timer: 1000,
  });
}
function exiterror() {
  document.getElementById("error").style.display = "none";
}