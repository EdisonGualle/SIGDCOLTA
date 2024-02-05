import React from "react";
import Tippy from "@tippyjs/react";
import "tippy.js/dist/tippy.css";

const TippyButton = ({ onClick, content, iconClass }) => {
  return (
    <Tippy placement="left" content={content}>
      <button onClick={onClick} data-tippy-content={content} title={content}>
        <i className={iconClass}></i>
      </button>
    </Tippy>
  );
};

export default TippyButton;
