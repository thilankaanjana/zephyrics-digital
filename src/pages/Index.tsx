import { Layout } from "@/components/layout/Layout";
import { HeroSection } from "@/components/sections/HeroSection";
import { ServicesSection } from "@/components/sections/ServicesSection";
import { WhyUsSection } from "@/components/sections/WhyUsSection";
import { ProcessSection } from "@/components/sections/ProcessSection";
import { ToolsSection } from "@/components/sections/ToolsSection";
import { TestimonialsSection } from "@/components/sections/TestimonialsSection";

const Index = () => {
  return (
    <Layout>
      <HeroSection />
      <ServicesSection />
      <WhyUsSection />
      <ProcessSection />
      <ToolsSection />
      <TestimonialsSection />
    </Layout>
  );
};

export default Index;
