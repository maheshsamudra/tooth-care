"use client";
import React from "react";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { useFormikContext } from "formik";

const FormikInput = (props) => {
  const { type = "text", name, placeholder = "", label = "" } = props;

  const formik = useFormikContext();

  const hasError = formik.touched[name] && formik.errors[name];

  return (
    <div className={"mb-4"}>
      {label && (
        <Label htmlFor={name} className={"block mb-2"}>
          {label}
        </Label>
      )}
      <Input
        type={type}
        id={name}
        name={name}
        placeholder={placeholder}
        autoComplete="off"
        value={formik?.values?.[name]}
        onChange={(e) => formik.setFieldValue(name, e.target.value)}
        className={hasError ? "border-red-500" : ""}
      />
    </div>
  );
};

export default FormikInput;
