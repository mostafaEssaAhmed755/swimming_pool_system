<?php
function getWeekeDate($id){
    switch ($id) {
        case '1':
            return 'السبت';
            break;
        case '2':
            return 'الاحد';
            break;
        case '3':
            return 'الاتنين';
            break;
        case '4':
            return 'الثلاثاء';
            break;
        case '5':
            return 'الاربعاء';
            break;
        case '6':
            return 'الخميس';
            break;
        case '7':
            return 'الجمعه';
            break;
    }
}
function getSystemName($id){
    switch ($id) {
        case '1':
            return 'شهري';
            break;
        case '2':
            return 'ربع سنوي';
            break;
        case '3':
            return 'نصف سنوي ';
            break;
        case '4':
            return 'سنوي';
            break;
    }
}
// Sat,Sun,Mon,Tue,Wed,Thu,Fri,
// input curent date date('D')
function getIdDay($Day){
    switch ($Day) {
        case 'Sat':
            return 1;
            break;
        case 'Sun':
            return 2;
            break;
        case 'Mon':
            return 3;
            break;
        case 'Tue':
            return 4;
            break;
        case 'Wed':
            return 5;
            break;
        case 'Thu':
            return 6;
            break;
        case 'Fri':
            return 7;
            break;
    }
}