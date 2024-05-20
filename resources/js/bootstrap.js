/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

function updateClock() {
    const month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];

    let currentTime = new Date();
    let day = currentTime.getDay();
    let currentDay = currentTime.getDay();
    let currentMonth = currentTime.getMonth();
    let currentYear = currentTime.getFullYear();
    // Operating System Clock Hours for 12h clock
    // Operating System Clock Hours for 24h clock
    let currentHours = currentTime.getHours();
    // Operating System Clock Minutes
    let currentMinutes = currentTime.getMinutes();
    // Operating System Clock Seconds
    let currentSeconds = currentTime.getSeconds();
    // Adding 0 if Minutes & Seconds is More or Less than 10
    currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
    currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

    // display first 24h clock and after line break 12h version
    let currentTimeString = hari[day] + "<br>" + currentDay + " " + month[currentMonth] + " " + currentYear + " " + currentHours + ":" + currentMinutes + ":" + currentSeconds;
    // let currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds;
    // print clock js in div #clock.
    $("#clock").html(currentTimeString);
    // $("#hari").html(hari[day]);
}
$(document).ready(function () {
    updateClock()

    setInterval(() => {
        updateClock()
    }, 1000);
});
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
//     wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
