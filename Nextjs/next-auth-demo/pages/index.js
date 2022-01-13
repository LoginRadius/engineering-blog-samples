import { useEffect } from "react";
import { useLRAuth } from "loginradius-react";
import { Text, Heading, VStack, Center } from "@chakra-ui/react";

import { useRouter } from "next/router";

export default function Home() {
  const { isLoading, isAuthenticated, error, user } = useLRAuth();
  const router = useRouter();

  useEffect(() => {
    if (user && isAuthenticated) {
      router.push("/profile");
    }
  }, [router, user, isAuthenticated]);

  if (isLoading) {
    return <div>Loading...</div>;
  }

  if (error) {
    return <div>Oops... {error.message}</div>;
  }

  return (
    <Center pt={10} color="black">
      <VStack spacing={[6, 8]}>
        <Heading as="h2">Welcome</Heading>

        <Text fontSize="3xl">Login to continue</Text>
      </VStack>
    </Center>
  );
}
