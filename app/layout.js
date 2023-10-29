import { Inter } from "next/font/google";
import AuthLayout from "@/components/auth-layout";

import "./globals.css";
import { Toaster } from "@/components/ui/toaster";

const inter = Inter({ subsets: ["latin"] });

export const metadata = {
  title: "Welcome to Tooth Care",
  description: "Built by Mahesh Samudra",
};

export default function RootLayout({ children }) {
  return (
    <html lang="en" className="h-full bg-white">
      <body className={`h-full ${inter.className}`}>
        <AuthLayout>{children}</AuthLayout>
        <Toaster />
      </body>
    </html>
  );
}
