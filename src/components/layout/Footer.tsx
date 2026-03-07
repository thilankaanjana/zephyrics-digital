import { Link } from "react-router-dom";
import { Mail, Phone, MapPin, Linkedin, Twitter, Instagram, ArrowRight } from "lucide-react";
import { Button } from "@/components/ui/button";

const footerLinks = {
  services: [
    { name: "Web Design", path: "/services#web-design" },
    { name: "SEO Optimization", path: "/services#seo" },
    { name: "UI/UX Design", path: "/services#ui-ux" },
    { name: "Branding", path: "/services#branding" },
  ],
  company: [
    { name: "About Us", path: "/about" },
    { name: "Portfolio", path: "/portfolio" },
    { name: "Blog", path: "/blog" },
    { name: "Contact", path: "/contact" },
  ],
  legal: [
    { name: "Privacy Policy", path: "/privacy" },
    { name: "Terms & Conditions", path: "/terms" },
  ],
};

export function Footer() {
  return (
    <footer className="bg-card border-t border-border">
      {/* CTA Section */}
      <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div className="relative overflow-hidden rounded-2xl bg-gradient-to-br from-primary/20 via-primary/10 to-transparent p-8 md:p-12 border border-primary/20">
          <div className="absolute inset-0 bg-grid-pattern bg-grid opacity-10" />
          <div className="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
              <h3 className="font-display text-2xl md:text-3xl font-bold text-foreground mb-2">
                Ready to grow your digital presence?
              </h3>
              <p className="text-muted-foreground text-lg">
                Let's build something amazing together.
              </p>
            </div>
            <Button variant="hero" size="xl" asChild>
              <Link to="/contact" className="flex items-center gap-2">
                Start Your Project <ArrowRight className="w-5 h-5" />
              </Link>
            </Button>
          </div>
        </div>
      </div>

      {/* Main Footer */}
      <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
          {/* Brand */}
          <div className="lg:col-span-1">
            <Link to="/" className="flex items-center gap-2 mb-4">
              <div className="w-10 h-10 rounded-lg bg-primary/20 flex items-center justify-center">
                <span className="text-primary font-display font-bold text-xl">Z</span>
              </div>
              <span className="font-display font-bold text-xl text-foreground">
                Zephyrics<span className="text-primary">Studio</span>
              </span>
            </Link>
            <p className="text-muted-foreground mb-6 leading-relaxed">
              Design. Technology. Growth. We help businesses thrive in the digital world.
            </p>
            <div className="flex gap-3">
              <a
                href="#"
                className="w-10 h-10 rounded-lg bg-muted flex items-center justify-center hover:bg-primary/20 hover:text-primary transition-all duration-200"
                aria-label="LinkedIn"
              >
                <Linkedin className="w-5 h-5" />
              </a>
              <a
                href="#"
                className="w-10 h-10 rounded-lg bg-muted flex items-center justify-center hover:bg-primary/20 hover:text-primary transition-all duration-200"
                aria-label="Twitter"
              >
                <Twitter className="w-5 h-5" />
              </a>
              <a
                href="#"
                className="w-10 h-10 rounded-lg bg-muted flex items-center justify-center hover:bg-primary/20 hover:text-primary transition-all duration-200"
                aria-label="Instagram"
              >
                <Instagram className="w-5 h-5" />
              </a>
            </div>
          </div>

          {/* Services */}
          <div>
            <h4 className="font-display font-semibold text-foreground mb-4">Services</h4>
            <ul className="space-y-3">
              {footerLinks.services.map((link) => (
                <li key={link.path}>
                  <Link
                    to={link.path}
                    className="text-muted-foreground hover:text-primary transition-colors duration-200"
                  >
                    {link.name}
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          {/* Company */}
          <div>
            <h4 className="font-display font-semibold text-foreground mb-4">Company</h4>
            <ul className="space-y-3">
              {footerLinks.company.map((link) => (
                <li key={link.path}>
                  <Link
                    to={link.path}
                    className="text-muted-foreground hover:text-primary transition-colors duration-200"
                  >
                    {link.name}
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          {/* Contact */}
          <div>
            <h4 className="font-display font-semibold text-foreground mb-4">Contact</h4>
            <ul className="space-y-3">
              <li>
                <a
                  href="mailto:hello@zephyricsstudio.com"
                  className="flex items-center gap-2 text-muted-foreground hover:text-primary transition-colors duration-200"
                >
                  <Mail className="w-4 h-4" />
                  hello@zephyricsstudio.com
                </a>
              </li>
              <li>
                <a
                  href="tel:+1234567890"
                  className="flex items-center gap-2 text-muted-foreground hover:text-primary transition-colors duration-200"
                >
                  <Phone className="w-4 h-4" />
                  +1 (234) 567-890
                </a>
              </li>
              <li className="flex items-start gap-2 text-muted-foreground">
                <MapPin className="w-4 h-4 mt-0.5" />
                <span>Serving clients worldwide</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      {/* Bottom Bar */}
      <div className="border-t border-border">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
          <div className="flex flex-col md:flex-row items-center justify-between gap-4">
            <p className="text-sm text-muted-foreground">
              © {new Date().getFullYear()} ZephyricsStudio. All rights reserved.
            </p>
            <div className="flex gap-6">
              {footerLinks.legal.map((link) => (
                <Link
                  key={link.path}
                  to={link.path}
                  className="text-sm text-muted-foreground hover:text-primary transition-colors duration-200"
                >
                  {link.name}
                </Link>
              ))}
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
}
