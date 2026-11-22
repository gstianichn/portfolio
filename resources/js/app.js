import Alpine from 'alpinejs';
import AOS from 'aos';
import Typed from 'typed.js';

window.Alpine = Alpine;
window.AOS = AOS;
window.Typed = Typed;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 750,
        easing: 'ease-out-cubic',
        once: true,
        offset: 50,
    });

    const typedElement = document.querySelector('#typed-role');
    if (typedElement) {
        new Typed('#typed-role', {
            strings: [
                'Full-Stack Web Developer',
                'Laravel &amp; React Builder',
                'AI &amp; Workflow Automation Enthusiast',
            ],
            typeSpeed: 55,
            backSpeed: 35,
            backDelay: 2000,
            loop: true,
        });
    }
});
