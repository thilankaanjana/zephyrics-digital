import { Link } from "react-router-dom";
import { 
  Globe, 
  Search, 
  Palette, 
  PenTool, 
  Layout, 
  Layers,
  ArrowRight 
} from "lucide-react";
import { Button } from "@/components/ui/button";

const services = [
  {
    icon: Globe,
    title: "Web Design & Development",
    description: "Custom websites that convert visitors into customers. Built with modern tech and SEO in mind.",
  },
  {
    icon: Search,
    title: "SEO & Optimization",
    description: "Rank higher on Google. Get found by your ideal customers with data-driven SEO strategies.",
  },
  {
    icon: Palette,
    title: "UI/UX Design",
    description: "Beautiful, intuitive interfaces that users love. Every pixel designed with purpose.",
  },
  {
    icon: PenTool,
    title: "Branding & Graphics",
    description: "Memorable brand identities that tell your story and stand out from the competition.",
  },
  {
    icon: Layout,
    title: "Landing Pages",
    description: "High-converting landing pages designed to capture leads and drive sales.",
  },
  {
    icon: Layers,
    title: "Digital Content",
    description: "Engaging visuals and content that connect with your audience across all platforms.",
  },
];

export function ServicesSection() {
  return (
    <section className="py-24 bg-background relative">
      <div className="container px-4 sm:px-6 lg:px-8">
        {/* Header */}
        <div className="text-center max-w-3xl mx-auto mb-16">
          <span className="text-primary text-sm font-semibold uppercase tracking-wider">Our Services</span>
          <h2 className="font-display text-3xl sm:text-4xl md:text-5xl font-bold text-foreground mt-3 mb-4">
            Everything You Need to
            <span className="gradient-text"> Grow Online</span>
          </h2>
          <p className="text-lg text-muted-foreground">
            From stunning websites to powerful SEO, we provide end-to-end digital solutions 
            tailored to your business goals.
          </p>
        </div>

        {/* Services Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {services.map((service, index) => (
            <div
              key={service.title}
              className="group p-8 rounded-2xl card-gradient border border-border hover:border-primary/30 transition-all duration-300 hover:-translate-y-1"
              style={{ animationDelay: `${index * 0.1}s` }}
            >
              <div className="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-6 group-hover:bg-primary/20 transition-colors">
                <service.icon className="w-6 h-6 text-primary" />
              </div>
              <h3 className="font-display text-xl font-semibold text-foreground mb-3">
                {service.title}
              </h3>
              <p className="text-muted-foreground leading-relaxed">
                {service.description}
              </p>
            </div>
          ))}
        </div>

        {/* CTA */}
        <div className="text-center mt-12">
          <Button variant="outline" size="lg" asChild>
            <Link to="/services" className="flex items-center gap-2">
              Explore All Services <ArrowRight className="w-4 h-4" />
            </Link>
          </Button>
        </div>
      </div>
    </section>
  );
}
