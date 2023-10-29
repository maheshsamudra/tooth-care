import React, { useEffect } from "react";
import { getIdTokenResult, onAuthStateChanged } from "firebase/auth";
import useUserStore from "@/stores/useUserStore";
import { firebaseAuth } from "@/config/firebase";
import { usePathname, useRouter } from "next/navigation";
import User from "@/classes/User";

const useAuthenticate = () => {
  const setUser = useUserStore((state) => state.setUser);
  const router = useRouter();
  const pathname = usePathname();

  useEffect(() => {
    onAuthStateChanged(firebaseAuth, (user) => {
      if (user) {
        if (pathname.includes("/auth/")) {
          router.push("/");
        }
        setUser(new User(user));
      } else {
        if (!pathname.includes("/auth/")) {
          router.push("/auth/login");
        }
        setUser({});
      }
    });
  }, []);
};

export default useAuthenticate;
