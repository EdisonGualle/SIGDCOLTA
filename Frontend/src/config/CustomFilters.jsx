import React from "react";

export const CustomTextFilter = (props) => (
  <input
    type="text"
    placeholder="Filtrar..."
    onInput={(e) => props.onTextChange(e.target.value)}
  ></input>
);

export const CustomNumberFilter = (props) => (
  <input
    type="number"
    placeholder="Filtrar..."
    onInput={(e) => props.onNumberChange(e.target.value)}
  ></input>
);
