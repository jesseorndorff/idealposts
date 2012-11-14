/*
 * Script from NETTUTS.com [modified by Mario Jimenez] V.3 (ENHANCED, WITH DATABASE & ADD WIDGETS FEATURE!!!)
 * @requires jQuery($), jQuery UI & sortable/draggable UI modules
 */

var iNettuts = {
    
    jQuery : $,
    
    settings : {
        columns : '.column',
        widgetSelector: '.widget',
        handleSelector: '.widget-head',
        contentSelector: '.widget-content',
        
        saveToDB: true,
        
        widgetDefault : {
            movable: true,
            removable: true,
            collapsible: true,
            editable: true,
            colorClasses: ['color-white', 'color-yellow', 'color-red', 'color-green'],
            content: "<div align='center'><p>New Idea</p></div>"
        },
        widgetIndividual : {}
    },

    init : function () {
        this.attachStylesheet('css/inettuts.js.css');
       // $('body').css({background:'#000'});
        $(this.settings.columns).css({visibility:'visible'});
        this.sortWidgets();
        this.addWidgetControls();
        this.makeSortable();
    },
    
    initWidget : function (opt) {
		var t = opt.id;
		t.replace(/^\s+|\s+$/g, "");	
		opt.id = t;
      if (!opt.content) opt.content=iNettuts.settings.widgetDefault.content;
      return '<li id="'+opt.id+'" class="new widget '+opt.color+'"><div class="widget-head"><h3>'+opt.title+'</h3><div class="clear"></div></div><div class="widget-content" id="cont'+opt.id+'">'+opt.content+'</div></li>';
    },
    
    loadWidget : function(id) {},
    
    addWidget : function (where, opt) {
      $("li").removeClass("new");
      var selectorOld = iNettuts.settings.widgetSelector;
      iNettuts.settings.widgetSelector = '.new';
      $(where).prepend(iNettuts.initWidget(opt));
      iNettuts.addWidgetControls();
      iNettuts.settings.widgetSelector = selectorOld;
      iNettuts.makeSortable();
      iNettuts.savePreferences();
      iNettuts.loadWidget(opt.id);
    },
    
    
    getWidgetSettings : function (id) {
        var $ = this.jQuery,
            settings = this.settings;
        return (id&&settings.widgetIndividual[id]) ? $.extend({},settings.widgetDefault,settings.widgetIndividual[id]) : settings.widgetDefault;
    },
    
    addWidgetControls : function () {
        var iNettuts = this,
            $ = this.jQuery,
            settings = this.settings;
            
        $(settings.widgetSelector, $(settings.columns)).each(function () {
            var thisWidgetSettings = iNettuts.getWidgetSettings(this.id);
            if (thisWidgetSettings.removable) {
                $('<a href="#" class="remove">Delete</a>').mousedown(function (e) {
                    /* STOP event bubbling */
                    e.stopPropagation();    
                }).click(function () {
                    if(confirm('This widget will be removed, ok?')) {
                        $(this).parents(settings.widgetSelector).animate({
                            opacity: 0    
                        },function () {
                            $(this).wrap('<div/>').parent().slideUp(function () {
                                $(this).remove();
                                iNettuts.savePreferences();
                            });
                        });
                    }
                    return false;
                }).appendTo($(settings.handleSelector, this));
            }
            
            if (thisWidgetSettings.editable) {
                $('<a href="#" class="edit">Edit</a>').mousedown(function (e) {
                    /* STOP event bubbling */
                    e.stopPropagation();    
                }).toggle(function () {
                    $(this).css({backgroundPosition: '', width: ''})
                        .parents(settings.widgetSelector)
                            .find('.edit-box').show().find('input').focus();
                    return false;
                },function () {
                    $(this).css({backgroundPosition: '', width: '12px'})
                        .parents(settings.widgetSelector)
                            .find('.edit-box').hide();
                    return false;
                }).appendTo($(settings.handleSelector,this));
                $('<div class="edit-box" style="display:none;"/>')
                    .append('<ul><li class="item"><label>Idea Title:</label><input value="' + $('h3',this).text() + '"/></li>')
                    .append((function(){
                        var colorList = '<li class="item"><label>Colors:</label><ul class="colors">';
                        $(thisWidgetSettings.colorClasses).each(function () {
                            colorList += '<li class="' + this + '"/>';
                        });
                        return colorList + '</ul>';
                    })()).append('<li class="item"><label>Notes:</label><textarea>' + $('.widget-content',this).text() + '</textarea></li>')
                    .append('</ul>')
                    .insertAfter($(settings.handleSelector,this));
				//	alert($('.widget-content',this).text());
            }
            
            if (thisWidgetSettings.collapsible) {
                $('<a href="#" class="collapse">Info</a>').mousedown(function (e) {
                    /* STOP event bubbling */
                    e.stopPropagation();    
                }).click(function(){
                    $(this).parents(settings.widgetSelector).toggleClass('collapsed');
                    /* Save prefs to cookie: */
                    iNettuts.savePreferences();
                    return false;    
                }).appendTo($(settings.handleSelector,this));
            }
        });
        
        $('.edit-box').each(function () {
            $('input',this).keyup(function () {
                $(this).parents(settings.widgetSelector).find('h3').text( $(this).val() );
                iNettuts.savePreferences();
            });
			$('textarea',this).keyup(function () {//alert('aasassa');
                $(this).parents(settings.widgetSelector).find('.widget-content').text($(this).val());
				//alert($(this).val());
                iNettuts.savePreferences();
            });
            $('ul.colors li',this).click(function () {
                
                var colorStylePattern = /\bcolor-[\w]{1,}\b/,
                    thisWidgetColorClass = $(this).parents(settings.widgetSelector).attr('class').match(colorStylePattern)
                if (thisWidgetColorClass) {
                    $(this).parents(settings.widgetSelector)
                        .removeClass(thisWidgetColorClass[0])
                        .addClass($(this).attr('class').match(colorStylePattern)[0]);
                    /* Save prefs to cookie: */
                    iNettuts.savePreferences();
                }
                return false;
                
            });
        });
        
    },
    
    attachStylesheet : function (href) {
        var $ = this.jQuery;
        return $('<link href="' + href + '" rel="stylesheet" type="text/css" />').appendTo('head');
    },
    
    makeSortable : function () {
        var iNettuts = this,
            $ = this.jQuery,
            settings = this.settings,
            $sortableItems = (function () {
                var notSortable = '';
                $(settings.widgetSelector,$(settings.columns)).each(function (i) {
                    if (!iNettuts.getWidgetSettings(this.id).movable) {
                        if(!this.id) {
                            this.id = 'widget-no-id-' + i;
                        }
                        notSortable += '#' + this.id + ',';
                    }
                });
                if (notSortable=='')
                  return $("> li", settings.columns);
                else
                  return $('> li:not(' + notSortable + ')', settings.columns);
            })();
        
        $sortableItems.find(settings.handleSelector).css({
            cursor: 'move'
        }).mousedown(function (e) {
						$(this).parents(settings.widgetSelector).addClass('collapsed');
            $sortableItems.css({width:''});
            $(this).parent().css({
                width: $(this).parent().width() + 'px'
            });
        }).mouseup(function () {
            if(!$(this).parent().hasClass('dragging')) {
                $(this).parent().css({width:''});
            } else {
                $(settings.columns).sortable('disable');
								$(this).parents(settings.widgetSelector).removeClass('collapsed');
            }
						
        });

        $(settings.columns).sortable('destroy');
        $(settings.columns).sortable({
            items: $sortableItems,
            connectWith: $(settings.columns),
            handle: settings.handleSelector,
            placeholder: 'widget-placeholder',
            forcePlaceholderSize: true,
            revert: 300,
            delay: 100,
            opacity: 0.8,
            containment: 'document',
            start: function (e,ui) {
                $(ui.helper).addClass('dragging');
            },
            stop: function (e,ui) {
                $(ui.item).css({width:''}).removeClass('dragging');
                $(settings.columns).sortable('enable');
                iNettuts.savePreferences();
            }
        });
    },
    
    savePreferences : function () {
        var iNettuts = this,
            $ = this.jQuery,
            settings = this.settings,
            cookieString = '';
            
        if(!settings.saveToDB) {return;}
        
        /* Assemble the cookie string */
        $(settings.columns).each(function(i){
            cookieString += (i===0) ? '' : '|';
            $(settings.widgetSelector,this).each(function(i){
                cookieString += (i===0) ? '' : ';';
                /* ID of widget: */
                cookieString += $(this).attr('id') + ',';
                /* Color of widget (color classes) */
                cookieString += $(this).attr('class').match(/\bcolor-[\w]{1,}\b/) + ',';
                /* Title of widget (replaced used characters) */
                cookieString += $('h3:eq(0)',this).text().replace(/\|/g,'[-PIPE-]').replace(/,/g,'[-COMMA-]') + ',';
                /* Collapsed/not collapsed widget? : */
                cookieString += $(settings.contentSelector,this).css('display') === 'none' ? 'collapsed'+ ',' : 'not-collapsed'+ ',';
				//' + $('.widget-content',this).text() + '
			
			
			
				var input = "&lt;";
				var e = document.createElement('div');
				  e.innerHTML = input;
				//  alert( e.childNodes[0].nodeValue);
				  var t = $('.widget-content',this).html();
				  t = t.replace(new RegExp('&lt;', 'g'),e.childNodes[0].nodeValue);
				  input = "&gt;";
				 e = document.createElement('div');
				  e.innerHTML = input;
				  
				 t = t.replace(new RegExp('&gt;', 'g'),e.childNodes[0].nodeValue);
				//t = t.replace('&gt;', e.childNodes[0].nodeValue);
			//	alert('t-----------'+t); 
				cookieString += t ;
            });
        });
        
        /* AJAX call to store string on database */
        $.post("iNettuts_rpc.php","value="+cookieString);
        
    },
    
    sortWidgets : function () {
		
        var iNettuts = this,
            $ = this.jQuery,
            settings = this.settings;
        
        if(!settings.saveToDB) {
         //   $('body').css({background:'#000'});
            $(settings.columns).css({visibility:'visible'});
            return;
        }
        
        $.post("iNettuts_rpc.php", "",
            function(data){
        
              var cookie=data;
			
            //  alert(cookie);
              if (cookie=="") {
               //   $('body').css({background:'#000'});
                  $(settings.columns).css({visibility:'visible'});
                  iNettuts.addWidgetControls();
                  iNettuts.makeSortable();
                  return;
              }
               
              /* For each column */
              $(settings.columns).each(function(i){
                  
                  var thisColumn = $(this),
                      widgetData = cookie.split('|')[i].split(';');
                      
                  $(widgetData).each(function(){
                      if(!this.length) {return;}
                      
                      /*
                      var thisWidgetData = this.split(','),
                          clonedWidget = $('#' + thisWidgetData[0]),
                          colorStylePattern = /\bcolor-[\w]{1,}\b/,
                          thisWidgetColorClass = $(clonedWidget).attr('class').match(colorStylePattern);
                      
                      // Add/Replace new colour class:
                      if (thisWidgetColorClass) {
                          $(clonedWidget).removeClass(thisWidgetColorClass[0]).addClass(thisWidgetData[1]);
                      }
                      
                      // Add/replace new title (Bring back reserved characters):
                      $(clonedWidget).find('h3:eq(0)').html(thisWidgetData[2].replace(/\[-PIPE-\]/g,'|').replace(/\[-COMMA-\]/g,','));
                      
                      // Modify collapsed state if needed:
                      if(thisWidgetData[3]==='collapsed') {
                          // Set CSS styles so widget is in COLLAPSED state
                          $(clonedWidget).addClass('collapsed');
                      }
          

                      $('#' + thisWidgetData[0]).remove();
                      $(thisColumn).append(clonedWidget);
                      */
                     
                      var thisWidgetData = this.split(','),
                          opt={
                            id: thisWidgetData[0],
                            color: thisWidgetData[1],
                            title: thisWidgetData[2].replace(/\[-PIPE-\]/g,'|').replace(/\[-COMMA-\]/g,','),
                            content: thisWidgetData[4]
                          };
					  thisWidgetData[0].replace(/^\s+|\s+$/g, "");	  
					 // alert(thisWidgetData[4]);
                      $(thisColumn).append(iNettuts.initWidget(opt));
					 
                      if (thisWidgetData[3]==='collapsed')
					  {
						//  $('# '+thisWidgetData[0]).addClass('collapsed');
						  $('#'+thisWidgetData[0]).addClass('collapsed');
					  }
                      iNettuts.loadWidget(thisWidgetData[0]);
                  });
              });
              
              
              /* All done, remove loading gif and show columns: */
            //  $('body').css({background:'#000'});
              $(settings.columns).css({visibility:'visible'});
              
              iNettuts.addWidgetControls();
              iNettuts.makeSortable();
              
            });

    }
  
};

iNettuts.init();	