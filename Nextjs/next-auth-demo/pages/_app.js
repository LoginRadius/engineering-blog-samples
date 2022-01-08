import { LRAuthProvider } from "loginradius-react";
import { ChakraProvider } from "@chakra-ui/react";
import Head from "next/head";
import Layout from "../layout";

function MyApp({ Component, pageProps }) {
  return (
    <>
      <Head>
        <title>Loginradius Next</title>
      </Head>
      <LRAuthProvider
        appName="nefejames1"
        apiKey="909cf7d5-5332-4071-ad98-43501a128d82"
        redirectUri={"http://localhost:3000/"}
      >
        <ChakraProvider>
          <Layout>
            <Component {...pageProps} />
          </Layout>
        </ChakraProvider>
      </LRAuthProvider>
    </>
  );
}

export default MyApp;
