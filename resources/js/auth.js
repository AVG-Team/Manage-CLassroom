import {
    Input,
    Ripple,
    initTWE,
} from "tw-elements";

import "preline"

initTWE({ Input, Ripple });

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

import "@lottiefiles/lottie-player";
