import { Button, Flex, Stack } from "@chakra-ui/react";
import { useLRAuth } from "loginradius-react";

export default function Nav() {
  const { isAuthenticated, user, loginWithRedirect, logout } = useLRAuth();

  return (
    <Flex
      justifyContent="end"
      alignItems="center"
      as="nav"
      bg="green.300"
      h="10vh"
      minH="24"
      p="4"
    >
      <Stack spacing={[6, 8]}>
        {!user && (
          <Button
            color="white"
            bg="black"
            fontSize="lg"
            _hover={{ bg: "#111" }}
            onClick={() => loginWithRedirect()}
          >
            Login to continue
          </Button>
        )}
        {isAuthenticated && user && (
          <Button
            color="white"
            bg="black"
            fontSize="lg"
            _hover={{ bg: "#111" }}
            onClick={() => logout()}
          >
            Log out
          </Button>
        )}
      </Stack>
    </Flex>
  );
}
