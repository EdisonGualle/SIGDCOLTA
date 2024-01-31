import React, { useEffect, useState } from "react";
import { AgGridReact } from "ag-grid-react";
import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-alpine.css";

import OptionsRenderer from "./OptionsRenderer";

const TableTiposCapacitaciones = ({ TiposCapacitaciones }) => {
  const [rowData, setRowData] = useState([]);

  useEffect(() => {
    setRowData(TiposCapacitaciones);
  }, [TiposCapacitaciones]);

  const [gridOptions] = useState({
    suppressClickEdit: true,
    onCellEditingStarted: (event) => {
      // Accede a los datos actuales de la fila
      const currentData = event.api.getRowNode(event.rowIndex).data;
    },
    onCellClicked: handleCellClicked,
    onRowEditingStarted: handleRowEditingStarted,
    onRowEditingStopped: handleRowEditingStopped,
    editType: "fullRow",
    columnDefs: [
      {
        field: "nombre",
        headerName: "Capacitacion",
        minWidth: 150,
        editable: true,
        suppressMenu: true,
        checkboxSelection: true,
        headerCheckboxSelection: true,
        chartDataType: "category",
      },
      {
        headerName: "Acciones",
        minWidth: 150,
        cellRenderer: OptionsRenderer,
        editable: false,
        colId: "acciones",
        checkboxSelection: false,
        filter: false,
        pinned: "right",
      },
      { headerName: "Descripción", field: "descripcion", suppressMenu: true, },
      { headerName: "Tipo de Evento", field: "tipoEvento", suppressMenu: true, },
      { headerName: "Institución", field: "institucion", suppressMenu: true, },
      { headerName: "Cantidad de Horas", field: "cantidadHoras", suppressMenu: true, },
      {
        headerName: "Fecha", field: "fecha",
        filter: "agDateColumnFilter",
        suppressMenu: true,
      },

    ],
    defaultColDef: {
      editable: true,
      filter: "agTextColumnFilter",
      filterParams: {
        filterOptions: ["contains"],
        defaultFilterOption: "contains",
        suppressAndOrCondition: true,
      },
      floatingFilter: true,
    },
  });

  function handleCellClicked(params) {
    if (
      params.column.colId === "acciones" &&
      params.event.target.dataset.action
    ) {
      const action = params.event.target.dataset.action;

      if (action === "edit") {
        params.api.startEditingCell({
          rowIndex: params.node.rowIndex,
          colKey: "nombre", // Puedes especificar la columna que deseas editar aquí
        });
      }

      if (action === "delete") {
        /* params.api.applyTransaction({
          remove: [params.node.data],
        }); */
      }

      if (action === "update") {
        params.api.stopEditing(false);
      }

      if (action === "cancel") {
        params.api.stopEditing(true);
      }
    }
  }

  function handleRowEditingStarted(params) {
    params.api.refreshCells({
      columns: ["acciones"],
      rowNodes: [params.node],
      force: true,
    });
  }

  function handleRowEditingStopped(params) {
    params.api.refreshCells({
      columns: ["acciones"],
      rowNodes: [params.node],
      force: true,
    });
  }

  return (
    <div className="ag-theme-quartz" style={{ width: "100%", height: "90%" }}>
      <AgGridReact
        pagination={true}
        gridOptions={gridOptions}
        rowData={rowData}
        rowSelection="multiple"
        domLayout='autoHeight'
      />
    </div>
  );
};

export default TableTiposCapacitaciones;
