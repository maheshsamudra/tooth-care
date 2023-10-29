import React from "react";
import ThemeSwitcher from "@/components/theme-switcher";
import { usePathname, useRouter } from "next/navigation";
import useUserStore from "@/stores/useUserStore";
import usePageTitle from "@/hooks/usePageTitle";
import { Button } from "@/components/ui/button";
import { LuLogOut } from "react-icons/lu";
import { Separator } from "@/components/ui/separator";
import User from "@/classes/User";
import { firebaseAuth } from "@/config/firebase";

const Header = () => {
  const User = useUserStore((state) => state.user);

  const pageTitle = usePageTitle();

  const pathname = usePathname();

  const isAuthPage = pathname.includes("/auth/");

  return (
    <header
      className={`${
        isAuthPage ? "fixed" : "sticky"
      } top-0 z-50 mb-3 w-full border-b bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60`}
    >
      <div className="container flex h-14 items-center">
        <h1 className={"font-semibold"}>{pageTitle || "Tooth Care"}</h1>
        <div className="flex flex-1 items-center space-x-2 justify-end">
          <nav className="flex items-center">
            <Logout />
            <ThemeSwitcher />
          </nav>
        </div>
      </div>
    </header>
  );
};

export default Header;

const Logout = () => {
  const user = new User(firebaseAuth?.currentUser);

  if (!user?.loggedIn) return null;

  return (
    <>
      <Button
        variant={"light"}
        className={"font-light"}
        onClick={() => user.logout()}
      >
        <LuLogOut className={"me-2"} />
        Logout
      </Button>
      <Separator orientation="vertical" className={"h-[24px]"} />
    </>
  );
};
