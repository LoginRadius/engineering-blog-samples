import { Box, Center, Heading } from "@chakra-ui/react";
import { useLRAuth } from "loginradius-react";

export default function Profile() {
  const { user, isAuthenticated, isLoading } = useLRAuth();

  if (isLoading) {
    return <div>Loading...</div>;
  }

  if (isAuthenticated) {
    return (
      <Box color="black">
        <Center mt={10}>
          <Heading a="h2">
            Welcome to your profile {user.Email[0].Value}
          </Heading>
        </Center>
      </Box>
    );
  }
}
