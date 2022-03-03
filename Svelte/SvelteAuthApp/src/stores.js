import { writable } from "svelte/store";

export const user = writable(localStorage.user?JSON.parse(localStorage.getItem('user')):null);
