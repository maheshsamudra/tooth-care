import React from "react";
import FormikInput from "@/components/ui/formik-input";
import Link from "next/link";

const ResetPassword = () => {
  return (
    <>
      <h2 className="text-center text-2xl font-semibold mb-10">
        Reset your password
      </h2>
      <form className="space-y-6" action="#" method="POST">
        <FormikInput name={"email"} type={"email"} label={"Email Address"} />

        <div>
          <button
            type="submit"
            className="flex w-full justify-center rounded-md bg-primary px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
          >
            Reset
          </button>
        </div>
      </form>

      <p className="mt-10 text-center text-sm text-gray-500 dark:text-gray-400">
        <Link href="/auth/login" className="">
          &larr; Back to login
        </Link>
      </p>
    </>
  );
};

export default ResetPassword;
