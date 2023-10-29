import { useEffect, useState } from "react";

const usePageTitle = (title) => {
  const [pageTitle, setPageTitle] = useState("");

  useEffect(() => {
    setPageTitle(title);
    return () => setPageTitle("");
  }, [title]);

  return pageTitle;
};

export default usePageTitle;
