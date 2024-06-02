import {
    Input,
    Ripple,
    initTWE,
} from "tw-elements";

import "preline";
import './toast.js';

initTWE({ Input, Ripple });

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

import "@lottiefiles/lottie-player";
