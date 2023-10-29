import React from "react";
import ThemeSwitcher from "@/components/theme-switcher";
import Logo from "../icon.png";
import Image from "next/image";

const Layout = ({ children }) => {
  return (
    <div className="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
      <div className="sm:mx-auto sm:w-full sm:max-w-sm">
        <Image
          className="mx-auto h-[64px] w-auto opacity-80 dark:invert"
          src={Logo}
          alt="Tooth Care"
        />
      </div>

      <div className="sm:mx-auto sm:w-full sm:max-w-sm">
        <div className="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
          {children}
        </div>
      </div>
    </div>
  );
};

export default Layout;
