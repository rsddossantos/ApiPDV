$(document).ready(
    function(){
        const urlParams = new URLSearchParams(window.location.search);
        localStorage.setItem('token', urlParams.get('token'));
        let token = localStorage.getItem('token');







    }
);