jQuery(document).ready(searchInputHandler);

function searchInputHandler(){

      var inputs = document.getElementsByClassName('search-input');
      for(var i = 0; i < inputs.length; i++){
          inputs[i].addEventListener("input",  multiSearchItems, false);
      }

      var selects = document.getElementsByClassName('search-select');
      for(var i = 0; i < selects.length; i++){
          selects[i].addEventListener("change",  multiSearchItems, false);
      }

};

// jQuery(document).ready(sectorFilter);

// function sectorFilter(){

//   //Used to filter partners by government with ?sector=Government
//   var sector = getUrlParameter('sector').toLowerCase();

//   if(sector == 'public-sector'){

//     jQuery('html, body').animate({
//       scrollTop: (jQuery("#listings").offset().top - 120)
//     }, 1000);

//     jQuery("#searchPartnerSector option").each(function(){
//       if(this.text == 'Public Sector'){
//           jQuery(this).attr('selected', true);
//       }
//       else{
//         jQuery(this).attr('selected', false);
//       }
//       multiSearchItems();
//     });

//   }
// }

function multiSearchItems(){

  //First we need to reset the items
  jQuery('.search-item, .search-group').show();
  jQuery('a.show-more').remove();

  //Second we loop over the search fields.
  jQuery('.search_container select, .search_container input').each(function(){

    var targetField = this.name.replace('search-', '');
    var itemValue = this.value.toLowerCase();

    //Checks for default values.
    if(itemValue != ''){

      //Checks for the type field which hides the whole groups
      if(targetField == 'type'){

        jQuery('.search-group').each(function(){

          var groupText = jQuery(this).find('.group-type').html().toLowerCase();

          if( groupText.indexOf(itemValue) > -1){
            jQuery(this).show();
          }
          else {
            jQuery(this).hide();
          }
        });

      }
      else{

      //Checks the items for keywords/tags.
      jQuery('.search-item:visible').each(function(){

        var itemText = jQuery(this).find('.' + targetField ).html().toLowerCase();

        if( itemText.indexOf(itemValue) > -1){
          jQuery(this).show();
        }
        else {
          jQuery(this).hide();
        }
      });

      //Finally we need to hide the groups with no items.
      jQuery('.search-group').each(function(){

        if(jQuery(this).css('display') !== 'none'){
          var items = jQuery(this).find('.search-item:visible').length;
          if(items > 0){
              jQuery(this).show();
          }
          else {
            jQuery(this).hide();
          }
        }

      });

    }
  }

  });

}

jQuery(document).ready(resourceLimitItems);

function resourceLimitItems(){

  jQuery('.resources-row').each(function(){

    var $this = jQuery(this);
    var cardItem = $this.find('.card-item');
    if(cardItem.length > 6){
      cardItem.each(function(){
        if(jQuery(this).index() > 5){
          jQuery(this).hide();
        }
      });
      $this.parent().append('<a class="show-more btn btn-primary">More Items</a>');
    }
    jQuery('a.show-more').click(function(e){
      e.preventDefault();
      jQuery(this).parent().find('.card-item:hidden').show();
      jQuery(this).remove();

    });
  });

}
