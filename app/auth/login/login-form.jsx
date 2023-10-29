"use client";

import React from "react";
import FormikInput from "@/components/ui/formik-input";
import { Form, Formik } from "formik";
import { firebaseAuth } from "@/config/firebase";
import { Button } from "@/components/ui/button";
import { signInWithEmailAndPassword } from "firebase/auth";
import { useToast } from "@/components/ui/use-toast";
import { devValue } from "@/utils";
import { useRouter } from "next/navigation";
import User from "@/classes/User";

// const user = new User();

const LoginForm = () => {
  const { toast } = useToast();
  const router = useRouter();

  return (
    <div>
      <Formik
        initialValues={{
          email: devValue("maheshsamudra@gmail.com"),
          password: devValue("Welcome@1234!"),
        }}
        onSubmit={async (values, actions) => {
          const { email, password } = values;

          const status = await User.login(email, password);

          console.log(status);
        }}
      >
        {({ isSubmitting, handleSubmit }) => (
          <Form autoComplete={"off"} onSubmit={handleSubmit}>
            <FormikInput
              name={"email"}
              type={"email"}
              label={"Email Address"}
            />

            <FormikInput
              name={"password"}
              type={"password"}
              label={"Password"}
            />

            <Button type="submit" loading={isSubmitting} className="w-full">
              Sign in
            </Button>
          </Form>
        )}
      </Formik>
    </div>
  );
};

export default LoginForm;
