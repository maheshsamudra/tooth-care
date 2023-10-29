import React from "react";
import Link from "next/link";

const AdminMenu = () => {
  return (
    <div className={"my-5"}>
      <ul>
        <li>
          <Link href={"/admin/companies"}>Companies</Link>
        </li>
      </ul>
    </div>
  );
};

export default AdminMenu;
