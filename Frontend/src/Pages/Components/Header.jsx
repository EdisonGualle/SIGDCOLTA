const Header = () => {
  return (
    <header className="flex justify-between p-5 bg-blue-500 text-white">
      <div className="flex items-center">
        <img src="logo.png" alt="Logo" className="w-10 h-10 mr-2" />
        <h1>GAD MUNICIPAL CANTON COLTA</h1>
      </div>
      <nav>
        <ul className="flex space-x-4">
          <li>
            <a href="/option1">Option 1</a>
          </li>
          <li>
            <a href="/option2">Option 2</a>
          </li>
          <li>
            <a href="/option3">Option 3</a>
          </li>
        </ul>
      </nav>
    </header>
  );
};

export default Header;