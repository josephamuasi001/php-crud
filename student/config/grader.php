<?php
function grade(int $score) {
    if($score > 90) {
        return 'A';
    }elseif($score > 80) {
        return 'B+';
    }elseif($score > 70) {
        return 'B';
    }elseif($score > 60) {
        return 'C+';
    }elseif($score > 50) {
        return 'C';
    }elseif($score > 40) {
        return 'D';
    }elseif($score > 30) {
        return 'E';
    }else {
        return 'F';
    }
}

?>