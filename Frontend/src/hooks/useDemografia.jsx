import { useContext } from "react";
import DemografiaContext from "../providers/DemografiaProvider";
const useDemografia = () => {
    return useContext(DemografiaContext);
};
export default useDemografia