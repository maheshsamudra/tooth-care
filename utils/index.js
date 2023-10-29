export const devValue = (value) =>
  process.env.NODE_ENV === "development" ? value : "";

export const isLocal = process.env.NODE_ENV === "development";
