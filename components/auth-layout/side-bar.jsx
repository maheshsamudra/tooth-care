import React from "react";
import { Avatar, AvatarFallback } from "@/components/ui/avatar";
import useUserStore from "@/stores/useUserStore";
import Link from "next/link";
import Image from "next/image";
import Logo from "@/app/icon.png";
import { Button } from "@/components/ui/button";
import { signOut } from "firebase/auth";
import { firebaseAuth } from "@/config/firebase";
import Menu from "@/components/auth-layout/menu";

const SideBar = () => {
  const user = useUserStore((state) => state.user);

  return (
    <>
      <div className="flex">
        <Link className="mr-auto flex items-center space-x-2" href="/">
          <Image
            src={Logo}
            alt={"Logo"}
            className={"dark:invert h-[32px] w-auto"}
          />
          <span className="">ToothCare</span>
        </Link>
        <Avatar className={"me-2"}>
          <AvatarFallback>
            {user?.email?.slice(0, 2)?.toUpperCase()}
          </AvatarFallback>
        </Avatar>
      </div>

      <Menu />

      <Button
        className={"mt-auto"}
        variant={"secondary"}
        onClick={() => {
          signOut(firebaseAuth)
            .then(() => router.push("/auth/login"))
            .catch(() => null);
        }}
      >
        Logout
      </Button>
    </>
  );
};

export default SideBar;
