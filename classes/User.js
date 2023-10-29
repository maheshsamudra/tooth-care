import React from "react";
import { firebaseAuth } from "@/config/firebase";
import { Button } from "@/components/ui/button";
import { signInWithEmailAndPassword, signOut } from "firebase/auth";

class User extends React.PureComponent {
  constructor(props) {
    super(props);
    this.data = props ?? null;
    this.loggedIn = !!props?.uid;
  }

  static async login(email, password) {
    return await signInWithEmailAndPassword(firebaseAuth, email, password)
      .then((userCredential) => {
        return userCredential;
      })
      .catch((error) => {
        return false;
      });
  }

  logout() {
    console.log("logout");
    signOut(firebaseAuth)
      .then(() => null)
      .catch(() => null);
  }
}

export default User;
