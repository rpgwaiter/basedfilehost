{
  description = "A flake for BasedFileHost";

  inputs =
    {
      nixpkgs.url = "nixpkgs/release-20.09";
    };

  outputs = { self, nixpkgs }: 
  let 
    pkgs = nixpkgs.pkgs;
    lib = nixpkgs.lib;
    appPackage = nixpkgs.appPackage;
  in {

    packages.x86_64-linux.nginx = nixpkgs.legacyPackages.x86_64-linux.nginx;

    defaultPackage.x86_64-linux = self.packages.x86_64-linux.nginx;

  };
}
