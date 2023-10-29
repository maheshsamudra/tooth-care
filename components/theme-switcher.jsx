"use client";

import React, { useEffect, useState } from "react";

import { RxMoon, RxSun } from "react-icons/rx";
import { Button } from "@/components/ui/button";

const ThemeSwitcher = () => {
  const [isDarkTheme, setIsDarkTheme] = useState(false);

  useEffect(() => {
    const systemDarkTheme = window.matchMedia(
      "(prefers-color-scheme: dark)",
    )?.matches;

    const userDarkTheme = localStorage.getItem("darkTheme") === "true";

    if (!localStorage.getItem("darkTheme")) {
      setIsDarkTheme(systemDarkTheme);
    } else {
      setIsDarkTheme(userDarkTheme);
    }
  }, []);

  useEffect(() => {
    if (isDarkTheme) {
      document.body.classList.add("dark");
    } else {
      document.body.classList.remove("dark");
    }
  }, [isDarkTheme]);

  return (
    <Button
      variant={"transparent"}
      onClick={() => {
        if (!isDarkTheme) {
          localStorage.setItem("darkTheme", "true");
        } else {
          localStorage.setItem("darkTheme", "false");
        }
        setIsDarkTheme(!isDarkTheme);
      }}
      className={"flex align-items-center justify-content-center p-3"}
    >
      {!isDarkTheme ? <RxSun size={20} /> : <RxMoon size={20} />}
    </Button>
  );
};

export default ThemeSwitcher;
