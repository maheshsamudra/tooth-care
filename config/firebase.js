import { initializeApp, getApps, getApp } from "firebase/app";
import { getAuth } from "firebase/auth";

const firebaseConfig = {
  apiKey: "AIzaSyA0rDW5GXxquLVXMg4Hot0rYmFZrnM8FG8",
  authDomain: "tooth-care-esoft.firebaseapp.com",
  projectId: "tooth-care-esoft",
  storageBucket: "tooth-care-esoft.appspot.com",
  messagingSenderId: "935548617144",
  appId: "1:935548617144:web:2259ca10b9adb4b50b8f4d",
};

if (getApps().length === 0) initializeApp(firebaseConfig);

export const firebaseAuth = getAuth(getApp());
