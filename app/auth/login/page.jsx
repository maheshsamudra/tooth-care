import React from "react";
import FormikInput from "@/components/ui/formik-input";
import { createUserWithEmailAndPassword } from "firebase/auth";
import { firebaseAuth } from "@/config/firebase";

import Link from "next/link";
import LoginForm from "@/app/auth/login/login-form";

export const metadata = {
  title: "Login",
};

const LoginPage = () => {
  return (
    <>
      <h2 className="text-center text-2xl font-semibold mb-10">
        Sign in to your account
      </h2>
      <LoginForm />

      <p className="mt-10 text-center text-sm text-gray-500 dark:text-gray-400">
        <Link href="/auth/reset-password">Forgot password?</Link>
      </p>
    </>
  );
};

export default LoginPage;
