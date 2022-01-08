import { Box } from "@chakra-ui/react";
import Nav from "./Nav";

export default function Layout({ children }) {
  return (
    <Box h="100vh" bg="green.50">
      <Nav />
      <Box>{children}</Box>
    </Box>
  );
}
