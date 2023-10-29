"use client";
import React from "react";
import useUserStore from "@/stores/useUserStore";
import useAuthenticate from "@/hooks/useAuthenticate";
import { usePathname, useRouter } from "next/navigation";
import Footer from "@/components/auth-layout/footer";
import Header from "@/components/auth-layout/header";
import Loading from "@/components/auth-layout/loading";

const AuthLayout = ({ children }) => {
  const user = useUserStore((state) => state.user);

  const pathname = usePathname();

  useAuthenticate();

  if (!user) {
    return <Loading />;
  }

  if (!user.loggedIn && !pathname.includes("/auth/")) {
    return <Loading />;
  }

  if (!user?.data?.uid) {
    return (
      <>
        <Header />
        {children}
      </>
    );
  }

  return (
    <div className={"min-h-screen flex flex-col"}>
      <Header />
      <div className="container">{children}</div>
      <Footer />
    </div>
  );
};

export default AuthLayout;
