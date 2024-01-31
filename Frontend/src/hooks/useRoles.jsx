import { useContext } from "react";
import RolesContext from "../providers/RolesProvider";
const useRoles = () => {
  return useContext(RolesContext);
};

export default useRoles;
