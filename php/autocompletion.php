<?php
header('Content-Type: text/javascript');
?>
(function () {
    'use strict';
    var inputId = <?php echo "'".$_GET['inputId']."'"; ?>;
    var collectionName=<?php echo "'".$_GET['collectionName']."'"; ?>;
    var divResultId=<?php echo "'".$_GET['divResultId']."'"; ?>;

    function add_error_check(xhr) { // some error checks
        myxhr.addEventListener('load', function () {
            if ((xhr.status >= 200) && (xhr.status < 400)) { // Le serveur a réussi à traiter la requête 
                //console.log(xhr.status + " " + xhr.statusText);
            } else { // Affichage des informations sur l 'échec du traitement de la requête
                console.error(xhr.status + " " + xhr.statusText);
            }
        });
    }

    function send_request(xhr) { // will send and handle the xhr request notably always abort it before sending a new
        var data = new FormData(),
            text = (document.getElementById(inputId)).value;

        xhr.abort();
        xhr.open('POST', './php/search.php');
        //xhr.open('POST', 'http://cam.ldnr.fr/~sebastienloubet/ajax/TP_10_11/pagetest.php');
        data.append('search', text);
        data.append('collection', collectionName);
        xhr.send(data);
    }

    function get_selected() { //return the currently selected element; note return null if none are selected
        return document.getElementById('selected');
    }

    function make_selected(elem) {
        var prevsel = get_selected();
        if (prevsel !== null) { // deselect the previously selected elements
            prevsel.setAttribute('id', '');
        }
        elem.setAttribute('id', 'selected'); // select the new element
    }

    function get_selected_index() { // return the selected div index by taking it from data-index or -1 if no selected
        var selected = get_selected();
        if (selected === null) return -1;
        return Number.parseInt(selected.getAttribute('data-index'));
    }

    function handle_key_up_down(keytext) { // handle the up down plot on the div. return true if a div was selected
        //console.log('And I detected it !');
        var res = document.getElementById(divResultId),
            size = res.children.length;
        if (size < 1) return false;
        if (size == 1) {
            make_selected(res.firstElementChild);
            //console.log('And I selected it !')
            return true;
        }
        var selindex = get_selected_index();
        if ((selindex < 0) || (selindex == size - 1) && (keytext == 'ArrowDown')) { //select the first element if no selection or we go down from the last one
            make_selected(res.firstElementChild);
            return true;
        }
        if ((selindex == 0) && (keytext == 'ArrowUp')) { // going up the first one, we select the last one
            make_selected(res.lastElementChild);
            return true;
        }
        if (keytext == 'ArrowDown') { //simply increase the index
            make_selected(res.children[selindex + 1]);
            return true;
        }
        if (keytext == 'ArrowUp') { //simply decrease the index
            make_selected(res.children[selindex - 1]);
            return true;
        }
        return false; //This line should never be read !
    }

    function handle_mouseover(event) { //the callback function of the mouseenter event
        make_selected(event.target);
        //console.log('Made a mouse over event on the element:' + get_selected_index());
    }

    function do_selection() { //return true if a selection have been copied to the textbox of the search field
        var selected = get_selected();
        if (selected == null) return false; //if there are no selection we abort else we copy the selected text in the box then we empty the list
        (document.getElementById(inputId)).value = selected.firstChild.textContent;
        refresh_list('');
        return true;
    }

    function handle_keypress(e, xhr) { //return true if it did match the pressed key
        //console.log('You pushed: ' + e.key);
        if ((e.key == "ArrowUp") || (e.key == "ArrowDown")) {
            handle_key_up_down(e.key);
            return true;
        }
        if (e.key == 'Enter') {
            do_selection();
        }
        if (((e.key.length == 1) && ((e.key.search(/[A-Za-zàâäèéêëîïôœùûüÿçÀÂÄÈÉÊËÎÏÔŒÙÛÜŸÇ]/)) != -1)) || e.key == 'Backspace' || e.key == 'Delete') {
            send_request(xhr);
            return true;
        }
        return false;
    }

    function refresh_list(xhrtext) { //handle the return string and refresh the list of the div
        var tab = xhrtext.split('|'), //split the return div
            ndiv, div = document.getElementById(divResultId),
            index = 0;
        while (div.firstChild !== null) div.removeChild(div.firstChild); //remove all childs
        for (var i = 0; i < tab.length; i++) { //fill the div with new divs if tab[i] is different from the null chain
            if (tab[i] !== '') {
                ndiv = document.createElement('div');
                ndiv.appendChild(document.createTextNode(tab[i]));
                ndiv.setAttribute('data-index', index); //store the index in the data-index attribute to conveniently get it afterward
                ndiv.addEventListener('mouseenter', handle_mouseover); //handle the selection by the mouse
                ndiv.addEventListener('click', do_selection); //handle the selection for the click
                div.appendChild(ndiv);
                index++;
            }
        }
        if (div.firstChild !== null) div.style = 'display: block;';
        else div.style = 'display: none;'; //hide the div if nothing to show
    }

    function add_listeners(xhr) {
                console.log(inputId);
        (document.getElementById(inputId)).addEventListener('keyup', function (e) {
            handle_keypress(e, xhr);
        })
        xhr.addEventListener('load', function (e) {
            refresh_list(xhr.responseText);
        });
    }
    //main
    var myxhr = new XMLHttpRequest(); // The objective is that there is one and only one XHR object in the whole function such as their are no multiple request send
    add_listeners(myxhr);

})();