<?php

function addAlert($type, $text){
        return '
        <div class="alert-container">
            <div class="alert alert-'.$type.' self-alert" role="alert">
                '.$text.'
            </div>
        </div>
            ';
}